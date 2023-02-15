const outDiv = document.getElementById('admin');

function fetchInfo(){
    fetch("http://localhost/tech-zone/public/profile/getInformation", {
        method:"GET",
        headers:{
            "Content-Type":"application/json"
        }
    }).then(function(response){
        return response.json();
    }
    ).then(function(data){
        console.log(data);
        createInfo(data);
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}

function createInfo(data){
    var html = "";
    html +="<image src='http://localhost/tech-zone/public/assets/images/user.png" + "'alt='profile image' class='profile-image' style='width: 100px'>";
    html += "<p>Name: "+data['name'] +" " + data['surname'] + "</p>"
    html += "<p>Email: " + data['email'] + "</p>";
    outDiv.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', function(){
    fetchInfo();
}
);