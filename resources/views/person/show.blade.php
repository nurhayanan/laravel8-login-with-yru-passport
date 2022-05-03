<div class="container">
    div class="card">
    <div class="card-header">ข้อมูลนักวิจัย</div>
<div class="card-body">

        <form method="POST" action="{{ route('contract.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="col-md-12">
        <table class="table table-hover">
            <?php $i=0; foreach ($data->data as $data)   ?>
            <tbody>
                <tr>
                    <td width="30%">ชื่อ-สกุล</td>
                    <td><?php echo $data->name; ?></td>
                </tr>
                <tr>
                    <td>ตำแหน่ง</td>
                    <td><?php echo $data->email; ?></td>
                </tr>

                <tr>
                    <td>สังกัด</td>
                    <td><?php echo $data->department; ?></td>
                </tr>


            </tbody>


        </table>

    </div>
</div>
</div>
<div class="card">
    <div class="card-header">ผลงาน </div>
                        <div class="card-body">
                             <div class="col-md-12">
                                <table class="table table-hover">
                                    <?php

                                    $url = "https://api1.yru.ac.th/profile/v1/users?include=journals,articles&paginate_false=true";

                                    $content = file_get_contents($url);
                                    $data = json_decode($content);
                                    ?>
                                    <?php $i=0; foreach ($data->data as $data) { $i++;  ?>
                                    <tbody>
                                        <tr>

                                            <?php $i=0; foreach ($data->articles as $articles)  ?>
                                          <td><?php echo $articles->title; ?></td>

                                        </tr>
                                        <?php } ?>




                                    </tbody>


                                </table>

                            </div>
