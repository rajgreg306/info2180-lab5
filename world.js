
document.addEventListener("DOMContentLoaded", () => {
    const country_button = document.getElementById("lookup");
    const city_button = document.getElementById("cities");

    country_button.addEventListener("click", () => {
        
        let country = document.getElementById("country").value;
        fetchData(country, "")
    });

    city_button.addEventListener("click", ()=> {
        let country = document.getElementById("country").value;
        fetchData(country, "cities")
    })
    
    
    const fetchData =(country, lookup) => {
        const httpRequest = new XMLHttpRequest();
        let url = `http://localhost/info2180-lab5/info2180-lab5/world.php?country=${country}`
        if(lookup){
            url += `&lookup=${lookup}`;
        }
        httpRequest.open('GET', url)

        httpRequest.onload = function() {
            if (httpRequest.status === 200){
                document.getElementById('result').innerHTML = httpRequest.responseText;
            } else{
                document.getElementById('result').innerHTML = "Error fetching countries";
            }
        }
    
        httpRequest.send();
    }
})

