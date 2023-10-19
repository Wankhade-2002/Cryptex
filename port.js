document.getElementById("portfolioForm").addEventListener("submit", function(event) {
    event.preventDefault();
  
    // Get input values
    const coinName = document.getElementById("coinName").value;
    const quantity = parseFloat(document.getElementById("quantity").value);
    const price = parseFloat(document.getElementById("price").value);
  
    // Calculate total value
    const totalValue = quantity * price;
  
    // Create portfolio item element
    const portfolioItem = document.createElement("li");
    portfolioItem.textContent = `${coinName} - Quantity: ${quantity} - Price: $${price.toFixed(2)} - Total Value: $${totalValue.toFixed(2)}`;
  
    // Append portfolio item to the list
    document.getElementById("portfolioList").appendChild(portfolioItem);
  
    // Reset form inputs
    document.getElementById("coinName").value="";
    // document.getElementById("coinName").style.color= "red";
    document.getElementById("quantity").value = "";
    document.getElementById("price").value = "";
  });
  