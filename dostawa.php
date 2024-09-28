<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dostawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
        body {
            background-image: url('dworcowapubUWU.png');
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }
    </style>
</head>
<body class="container">
    <h1 class="text-center mt-5">Wybierz kategorię:</h1>
    <div class="text-center">
        <button class="btn btn-primary" onclick="showProducts('piwo')">Piwo</button>
        <button class="btn btn-primary" onclick="showProducts('napoje')">Napoje</button>
        <button class="btn btn-primary" onclick="showProducts('wodka')">Wódka</button>
    </div>
    <div id="productList" class="mt-3" style="display: none;">
        <h2 class="text-center">Lista produktów:</h2>
        <form id="deliveryForm" action="saveDelivery.php" method="POST" onsubmit="return saveDelivery()">
            <select id="productsDropdown" class="form-select mb-3" name="product"></select>
            <div class="text-center">
                <input type="number" id="quantity" class="form-control mb-3" placeholder="Ilość" min="1" name="quantity">
                <input type="hidden" id="category" name="category"> 
                <button type="submit">Zapisz dostawę</button>
            </div>
        </form>
    </div>

<script>
    function showProducts(category) {
        var dropdown = document.getElementById("productsDropdown");
        dropdown.innerHTML = "";
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var products = JSON.parse(xhr.responseText);
                console.log(products);

                products.forEach(function(product) {
                    var option = document.createElement("option");
                    option.text = product.nazwa;
                    dropdown.add(option);
                });

                document.getElementById("productList").style.display = "block";
                document.getElementById("category").value = category; 
            }
        };
        xhr.open("GET", "getProducts.php?category=" + category, true);
        xhr.send();
    }

    function saveDelivery() {
    var category = document.getElementById("category").value;
    var product = document.getElementById("productsDropdown").value;
    var quantity = document.getElementById("quantity").value;

    console.log("Category: " + category);
    console.log("Product: " + product);
    console.log("Quantity: " + quantity);

    if (!product || !quantity) {
        console.error("Brak wymaganych danych (product lub quantity).");
        return false; 
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                
                window.location.href = "home.php";
            } else {
                console.error("Wystąpił błąd podczas zapisywania dostawy.");
            }
        }
    };

    xhr.open("POST", "saveDelivery.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`category=${encodeURIComponent(category)}&product=${encodeURIComponent(product)}&quantity=${quantity}`);

    return false;
}
</script>
</body>
</html>
