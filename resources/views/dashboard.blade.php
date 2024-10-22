
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Simple Dashboard</title>
  
  <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

.dashboard {
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 250px;
  background-color: #333;
  padding: 20px;
  color: white;
}

.sidebar h2 {
  color: #fff;
  text-align: center;
  margin-bottom: 20px;
}

.sidebar ul {
  list-style-type: none;
}

.sidebar ul li {
  margin: 15px 0;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 10px;
  background-color: #444;
  border-radius: 5px;
  text-align: center;
}

.sidebar ul li a:hover {
  background-color: #555;
}

.content {
  flex-grow: 1;
  padding: 40px;
}

h1 {
  color: #333;
}

p {
  font-size: 18px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table, th, td {
  border: 1px solid #ccc;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f4f4f4;
}

input[type="text"], select {
  width: 100%;
  padding: 5px;
  margin-top: 5px;
}

button {
  padding: 10px 15px;
  margin-top: 10px;
  cursor: pointer;
}


.popup-form {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border: 1px solid #ccc;
  z-index: 1000;
  width: 22%;
}

.hidden {
  display: none;
}

#popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
}

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            /* padding: 20px; */
        }
        h2 {
            margin-bottom: 10px;
            color: #333;
        }
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .module {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            flex: 1 1 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .module h3 {
            margin-bottom: 15px;
            font-size: 1.2em;
            color: #444;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        select {
            appearance: none;
        }
        .form-group-inline {
            display: flex;
            gap: 10px;
        }
        .form-group-inline .form-group {
            flex: 1;
        }
        input[readonly] {
            background-color: #f1f1f1;
        }
        .status-radio {
            display: flex;
            gap: 10px;
        }
        .status-radio label {
            font-weight: normal;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .item-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }
        .item-list input, .item-list select {
            padding: 5px;
        }
        @media (max-width: 768px) {
            .form-group-inline {
                flex-direction: column;
            }
        }


        body {
    font-family: Arial, sans-serif;
   
    background-color: #f4f4f4;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-bottom: 20px;
}

button {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}




</style>










<!-- popup -->
  <div class="dashboard">
  
  <div class="sidebar">
  <ul>
  <li><a href="#" id="dashboard-link">Dashboard</a></li>
    <li><a href="#" id="suppliers-link">Suppliers</a></li>
    <li><a href="#" id="items-link">Items</a></li>
    <li><a href="#" id="purchase-link">Purchase Order</a></li>
    <li><a href="#" id="logout-link">Logout</a></li>

  </ul>
</div>

<div class="content">
  <h1>Welcome to the Dashboard</h1>
  <p id="content-display">Please select an option from the sidebar.</p>

  <!-- Suppliers Section -->
  <div class="Suppliers-container" id="suppliers-container" style="display:none;">
    <h2>Suppliers</h2>
    <button id="add-supplier-btn">Add New Supplier</button>
    <table>
      <thead>
        <tr>
          <th>Supplier No</th>
          <th>Supplier Name</th>
          <th>Address</th>
          <th>TAX No</th>
          <th>Country</th>
          <th>Mobile No.</th>
          <th>status</th>

          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <!-- Items Section -->
  <div class="item-container" id="items-container" style="display:none;">
    <h2>Items</h2>
    <button id="add-item-btn">Add Item</button>
    <table>
      <thead>
        <tr>
          <th>Item No</th>
          <th>Item Name</th>
          <th>Inventory Location</th>
          <th>Brand</th>
          <th>Category</th>
          <th>Supplier</th>
          <th>Stock Unit</th>
          <th>Unit Price</th>
          <th>Item Images</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <!-- Purchase Section -->
  <div class="Purchase-container" id="purchase-container" style="display:none;">
    <h2>Purchase</h2>
    <button id="add-purchase-btn">Add Purchase order</button>
    <table>
      <thead>
        <tr>
          <th>Item No</th>
          <th>Item Name</th>
          <th>Stock Unit</th>
          <th>Unit Price</th>
          <th>Packing Unit</th>
          <th>Order Qty</th>
          <th>Item Amount</th>
          <th>Discount</th>
          <th>Net Amount</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>



    </div>

    
  <!-- supplier popup -->

  <div id="popup-form" class="popup-form hidden">
  <form id="add-supplier-form">
    <h3>Module 1: Supplier</h3>

    
    <div class="form-group">
      <label for="supplierName">Supplier Name</label>
      <input type="text" id="supplierName" placeholder="Enter Supplier Name" required>
    </div>
    
    <div class="form-group">
      <label for="address">Address</label>
      <textarea id="address" rows="3" placeholder="Enter Address" required></textarea>
    </div>
    
    <div class="form-group">
      <label for="taxNo">TAX No</label>
      <input type="text" id="taxNo" placeholder="Enter TAX No" required>
    </div>
    
    <div class="form-group">
      <label for="country">Country</label>
      <select id="country" required>
        <option value="" disabled selected>Select Country</option>
        <option value="USA">USA</option>
        <option value="Canada">Canada</option>
        <option value="UK">UK</option>
      </select>
    </div>
    
    <div class="form-group-inline">
      <div class="form-group">
        <label for="mobileNo">Mobile No</label>
        <input type="text" id="mobileNo" placeholder="Enter Mobile No" required pattern="[0-9]{10}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter Email" required>
      </div>
    </div>
    
    <div class="form-group">
      <label>Status</label>
      <div class="status-radio">
        <label><input type="radio" name="status" value="Active" checked> Active</label>
        <label><input type="radio" name="status" value="Inactive"> Inactive</label>
        <label><input type="radio" name="status" value="Blocked"> Blocked</label>
      </div>
    </div>

    <button type="submit">save supplier</button>
    <button type="button" id="cancel-btn">Cancel</button>
    

  </form>
</div>


<!-- item -->

<div id="popup-forms" class="popup-form hidden"> 
    <form id="add-item-form"> 
        <h3>Add Item</h3>
        
        <label>Item Name:</label>
        <input type="text" id="item-name" required /><br>

        <label>Inventory Location:</label>
        <input type="text" id="inventory-location" required /><br>

        <label>Brand:</label>
        <input type="text" id="item-brand" required /><br>

        <label>Category:</label>
        <input type="text" id="item-category" required /><br>

        <label>Supplier:</label>
       
<select id="item-supplier" required>
    <option value="">Select Supplier</option>
</select><br>
        <label>Stock Unit:</label>
        <select id="stock-unit" required>
            <option value="">Select Unit</option>
            <option value="pcs">Pieces</option>
            <option value="kg">Kilograms</option>
            <option value="liters">Liters</option>
            <!-- Add more options as needed -->
        </select><br>

        <label>Unit Price:</label>
        <input type="number" id="unit-price" required /><br>

        <label>Item Images:</label>
        <input type="file" id="item-images" multiple accept="image/*" /><br>

        <label>Status:</label>
        <select id="item-status">
            <option value="Enabled" selected>Enabled</option>
            <option value="Disabled">Disabled</option>
        </select><br><br>

        <button type="submit">Save Item</button>
        <button type="button" id="cancel-btn">Cancel</button>
    </form>
</div>



<!-- purchase-order -->
<div id="popup-frm" class="popup-form hidden"> 
  <form id="add-order-form"> 
    <h3>Add Order</h3>
    <label>Order Date:</label>
    <input type="date" id="order-date" value="<?php echo date('Y-m-d'); ?>" readonly /><br>

    <label>Supplier:</label>
       
       <select id="order-supplier" required>
           <option value="">Select Supplier</option>
       </select><br>

    <label>Item Total:</label>
    <input type="text" id="item-total" /><br>

    <label>Discount:</label>
    <input type="text" id="discount" /><br>

    <label>Net Amount:</label>
    <input type="text" id="net-amount"/><br>

    <button type="submit">Save Order</button>
    <button type="button" id="cancel-btn">Cancel</button>
  </form>
</div>

  

  <script>

let supplierCount = 0;
let itemCount = 0;
const suppliers = [];



document.addEventListener("DOMContentLoaded", function() {
//   renderSuppliersTable();

  // Add event delegation for the suppliers-container
  document.getElementById("suppliers-container").addEventListener("click", function(event) {
    if (event.target.id === "add-supplier-btn") {
    
    }
  });
});



// Function to close the supplier form
function closeSupplierForm() {
  document.getElementById("popup-form").remove(); // Remove the form from the DOM
  document.getElementById("popup-overlay").remove(); // Remove the overlay
}

</script>

<script>
  document.body.addEventListener("click", function(event) {
    if (event.target && event.target.id === "add-supplier-btn") {
        document.getElementById("popup-form").classList.remove("hidden");
    } else if (event.target && event.target.id === "cancel-btn") {
        document.getElementById("popup-form").classList.add("hidden");
    }
});



document.body.addEventListener("click", function(event) {
    if (event.target && event.target.id === "add-item-btn") {
        document.getElementById("popup-forms").classList.remove("hidden");
    } else if (event.target && event.target.id === "cancel-btn") {
        document.getElementById("popup-forms").classList.add("hidden");
    }
});


document.body.addEventListener("click", function(event) {
    if (event.target && event.target.id === "add-purchase-btn") {  // Use the correct ID here
        document.getElementById("popup-frm").classList.remove("hidden");
    } else if (event.target && event.target.id === "cancel-btn") {
        document.getElementById("popup-frm").classList.add("hidden");
    }
});



 // Get all the links and containers
 const suppliersLink = document.getElementById('suppliers-link');
  const itemsLink = document.getElementById('items-link');
  const purchaseLink = document.getElementById('purchase-link');

  const suppliersContainer = document.getElementById('suppliers-container');
  const itemsContainer = document.getElementById('items-container');
  const purchaseContainer = document.getElementById('purchase-container');

  // Function to hide all sections
  function hideAllContainers() {
    suppliersContainer.style.display = 'none';
    itemsContainer.style.display = 'none';
    purchaseContainer.style.display = 'none';
  }

  // Add click event listeners
  suppliersLink.addEventListener('click', function() {
    hideAllContainers();
    suppliersContainer.style.display = 'block';
  });

  itemsLink.addEventListener('click', function() {
    hideAllContainers();
    itemsContainer.style.display = 'block';
  });

  purchaseLink.addEventListener('click', function() {
    hideAllContainers();
    purchaseContainer.style.display = 'block';
  });

  const dashboardLink = document.getElementById('dashboard-link');

// Function to hide all tables
function hideAllContainers() {
    suppliersContainer.style.display = 'none';
    itemsContainer.style.display = 'none';
    purchaseContainer.style.display = 'none';
}

dashboardLink.addEventListener('click', function() {
    hideAllContainers(); // Hide all tables when Dashboard is clicked
});





//supplier...... 


document.getElementById('add-supplier-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('/supplier', {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        supplierName: document.getElementById('supplierName').value,
        address: document.getElementById('address').value,
        taxNo: document.getElementById('taxNo').value,
        country: document.getElementById('country').value,
        mobileNo: document.getElementById('mobileNo').value,
        email: document.getElementById('email').value,
        status: document.querySelector('input[name="status"]:checked').value,
    })
})
.then(response => response.json())
.then(data => {
    alert(data.message);
    fetchSuppliers();
})
.catch(error => console.error('Error:', error));
})

function fetchSuppliers() {
    fetch('/suppliers')
    .then(response => response.json())
    .then(suppliers => {
        const tableBody = document.querySelector('#suppliers-container tbody');
        tableBody.innerHTML = '';

        suppliers.forEach((supplier, index) => {
            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${supplier.name}</td>
                    <td>${supplier.address}</td>
                    <td>${supplier.tax_no}</td>
                    <td>${supplier.country}</td>
                    <td>${supplier.mobile_no}</td>
                    <td>${supplier.status}</td>
                    
                    <td><button onclick="deleteSupplier(${supplier.id})">Delete</button></td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });

        document.getElementById('suppliers-container').style.display = 'block';
    });
}

function deleteSupplier(supplierId) {
    if (confirm('Are you sure you want to delete this supplier?')) {
        fetch(`/supplier/${supplierId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            fetchSuppliers();  // Refresh the supplier list after deletion
        })
        .catch(error => console.error('Error:', error));
    }
}


// item delete

function deleteItem(itemId) {
    if (confirm('Are you sure you want to delete this item?')) {
        fetch(`/item/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            fetchItems();  // Refresh the item list after deletion
        })
        .catch(error => console.error('Error:', error));
    }
}

// items

function fetchItems() {
    fetch('/items')
        .then(response => response.json())
        .then(items => {
            let tableBody = document.querySelector('#items-container tbody');
            tableBody.innerHTML = '';

            items.forEach((item, index) => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.inventory_location}</td>
                        <td>${item.brand}</td>
                        <td>${item.category}</td>
                        <td>${item.supplier.name}</td>
                        <td>${item.stock_unit}</td>
                        <td>$${item.unit_price}</td>
                        <td>${item.images ? `<img src="/storage/${item.images.split(',')[0]}" width="50">` : ''}</td>
                        <td>${item.status}</td>
                        <td><button onclick="deleteItem(${item.id})">Delete</button></td>
                    </tr>`;
            });
        });
}


document.getElementById('add-item-form').addEventListener('submit', function (event) {
    event.preventDefault();

    // Get all form data
    const itemName = document.getElementById('item-name').value;
    const inventoryLocation = document.getElementById('inventory-location').value;
    const itemBrand = document.getElementById('item-brand').value;
    const itemCategory = document.getElementById('item-category').value;
    const itemSupplier = document.getElementById('item-supplier').value;
    const stockUnit = document.getElementById('stock-unit').value;
    const unitPrice = document.getElementById('unit-price').value;
    const itemStatus = document.getElementById('item-status').value;

    // Handle image upload
    const images = document.getElementById('item-images').files;
    const formData = new FormData();
    formData.append('name', itemName);
    formData.append('inventory_location', inventoryLocation);
    formData.append('brand', itemBrand);
    formData.append('category', itemCategory);
    formData.append('supplier_id', itemSupplier);
    formData.append('stock_unit', stockUnit);
    formData.append('unit_price', unitPrice);
    formData.append('status', itemStatus);

    // Append each image file to the form data
    for (let i = 0; i < images.length; i++) {
        formData.append('images[]', images[i]);
    }

    // Send the POST request
    fetch('/item', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        fetchItems();  // Refresh the item list after adding the new item
    })
    .catch(error => console.error('Error:', error));
});

// Function to fetch suppliers and populate the dropdown
function fetchSuppdrop(dropdownId) {
    fetch('/activesuppliers')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            let supplierDropdown = document.getElementById(dropdownId);
            supplierDropdown.innerHTML = '<option value="">Select Supplier</option>';  // Clear existing options
            
            // Populate dropdown with suppliers
            data.forEach(supplier => {
                let option = document.createElement('option');
                option.value = supplier.id;  // Assuming supplier has an 'id' attribute
                option.text = supplier.name;  // Assuming supplier has a 'name' attribute
                supplierDropdown.add(option);  // Add the option to the dropdown
            });
        })
        .catch(error => {
            console.error('Error fetching suppliers:', error);
        });
}

// Call this function for Add Item Form

// orders.....

document.getElementById('add-order-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    const orderDate = document.getElementById('order-date').value;
    const supplierId = document.getElementById('order-supplier').value;
    const itemTotal = document.getElementById('item-total').value;
    const discount = document.getElementById('discount').value;
    const netAmount = document.getElementById('net-amount').value;

    fetch('/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            order_date: orderDate,
            supplier_id: supplierId,
            item_total: itemTotal,
            discount: discount,
            net_amount: netAmount
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            addToPurchaseTable(data.order);
            document.getElementById('popup-frm').classList.add('hidden');  // Close form popup
        }
    })
    .catch(error => console.error('Error:', error));
});



function addToPurchaseTable(order) {
    const tableBody = document.querySelector('#purchase-container tbody');
    
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>101</td>
        <td>item name</td> <!-- Replace with item name based on selected supplier -->
        <td>100</td> <!-- Stock unit, fetched from item data -->
        <td>$10.00</td> <!-- Unit price, fetched from item data -->
        <td>Box</td> <!-- Fixed as 'Box' -->
        <td>2</td> <!-- Default order quantity as 2 -->
        <td>$${order.item_total}</td> <!-- Item amount -->
        <td>${order.discount}%</td> <!-- Discount -->
        <td>$${order.net_amount}</td> <!-- Net amount -->
        <td>Active</td> <!-- Status -->
        <td><button onclick="deleteOrder(${order.id})">Delete</button></td> <!-- Delete action -->
    `;
    
    tableBody.appendChild(newRow);
}


function deleteOrder(orderId) {
    if (confirm('Are you sure you want to delete this order?')) {
        fetch(`/orders/${orderId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            document.querySelector(`#purchase-container tbody tr[data-id="${orderId}"]`).remove();  // Remove the row from table
        })
        .catch(error => console.error('Error:', error));
    }
}



fetchSuppdrop();
window.onload = function() {
    fetchSuppliers();
    fetchItems();
    addToPurchaseTable();
};
document.addEventListener('DOMContentLoaded', function() {
    fetchSuppdrop('item-supplier');  // Populate supplier dropdown in Add Item form
    fetchSuppdrop('order-supplier'); // Populate supplier dropdown in Add Order form
});
  </script>
</body>
</html>

    

