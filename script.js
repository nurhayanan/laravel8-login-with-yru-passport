// fetch('')
//     .then(function (response){
//         return response.json()
//     })
//     .then(function (data) {
//         appendData(data)
//     })
//     .catch(function (err) {
//         console.log('error: ' + err)
//     })
// const myJSON ="https://api1.yru.ac.th/profile/v1/users/jarunee.kar?include=journals,articles";

fetch('people.json')
    .then(response =>  response.json())
    .then(data => appendData(data))
    .catch(err => {console.log('error: ' + err)})

function appendData(data) {
    var mainContainer = document.getElementById("myData");
    for (var i = 0; i < data.length; i++) {
        
        var td = document.createElement("tr");
        // div.innerHTML = "Name: " + data[i].firstNamee + '' + data[i].lastName;
        td.innerHTML = ` ${data[i].prefix } ${data[i].name }`;
        // tr.innerHTML = ` ${data[i].email }`;
        // div.innerHTML = ` ${data[i].username }`;
        mainContainer.appendChild(td);
       
    }
}