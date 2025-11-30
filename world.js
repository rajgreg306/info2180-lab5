
document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById("lookup");

    button.addEventListener("click", () => {
        const httpRequest = new XMLHttpRequest();
        let country = document.getElementById("country").value;
        let url = `http://localhost/info2180-lab5/info2180-lab5/world.php?country=${country}`
        httpRequest.open('GET', url)

    httpRequest.onload = function() {
        if (httpRequest.status === 200){
            document.getElementById('result').innerHTML = httpRequest.responseText;
        } else{
            document.getElementById('result').innerHTML = "Error fetching countries";
        }
    }
    
    httpRequest.send();

    })
})

