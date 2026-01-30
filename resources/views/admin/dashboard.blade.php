<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl">Product Dashboard</h2>
</x-slot>

<div class="p-6">

    <!-- CATEGORY CARDS -->
    <div id="mainCategoryCards" class="grid grid-cols-6 gap-6 mb-6">
        @foreach($categories->whereNull('parent_id') as $cat)
            <div class="card bg-white rounded-2xl p-6 shadow cursor-pointer hover:-translate-y-1 transition"
                 onclick="showSubCategories({{ $cat->id }})">
                <div class="w-[50px] h-[50px] rounded-lg flex items-center justify-center mb-4 text-lg bg-indigo-100 text-indigo-500">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-500 mb-1">{{ $cat->name }}</h3>
            </div>
        @endforeach
    </div>

    <!-- SUBCATEGORY CARDS -->
    <div id="subCategoryCards" class="grid grid-cols-6 gap-6 mb-6" style="display:none"></div>

    <!-- ADD PRODUCT BUTTON -->
    <button onclick="showForm()" class="bg-indigo-600 text-white px-4 py-2 mb-4 rounded">
        Add New Product
    </button>

    <!-- CREATE / EDIT FORM -->
    <div id="formBox" style="display:none" class="mb-6 bg-white p-4 rounded shadow w-1/2">
        <input id="name" placeholder="Product Name" class="border p-2 w-full mb-2">
        <input id="price" placeholder="Price" class="border p-2 w-full mb-2">
        <input id="stock" placeholder="Stock" class="border p-2 w-full mb-2">

        <select id="category_id" class="border p-2 w-full mb-2">
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <input id="brand" placeholder="Brand" class="border p-2 w-full mb-2">
        <input id="description" placeholder="Description" class="border p-2 w-full mb-2">
        <input id="image" type="file" class="border p-2 w-full mb-2">

        <button id="saveBtn" onclick="storeProduct()" class="bg-green-600 text-white px-4 py-2 rounded">Save Product</button>
        <button id="updateBtn" onclick="updateProduct()" class="bg-yellow-400 text-white px-4 py-2 rounded" style="display:none">Update Product</button>
    </div>

    <!-- PRODUCTS TABLE -->
    <table class="w-full border bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Image</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Brand</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody id="productTable"></tbody>
    </table>
</div>

<script>
const token = '{{ auth()->user()->createToken("api-token")->plainTextToken }}'; // Bearer token
let editingId = null;

// HEADERS WITH BEARER TOKEN
const headers = {
    'Authorization': 'Bearer ' + token
};

// CLEAR FORM
function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('price').value = '';
    document.getElementById('stock').value = '';
    document.getElementById('category_id').value = '';
    document.getElementById('brand').value = '';
    document.getElementById('description').value = '';
    document.getElementById('image').value = '';
}

// SHOW FORM
function showForm() {
    document.getElementById('formBox').style.display = 'block';
    document.getElementById('saveBtn').style.display = 'inline-block';
    document.getElementById('updateBtn').style.display = 'none';
    editingId = null;
    clearForm();
}

// LOAD PRODUCTS
async function loadProducts() {
    try {
        const res = await fetch('/api/products', { headers });
        const data = await res.json();
        renderTable(data);
    } catch (err) {
        console.error(err);
        alert('Failed to load products');
    }
}

// RENDER TABLE
function renderTable(data) {
    let rows = '';
    data.forEach(p => {
        rows += `
        <tr>
            <td class="border p-2">${p.id}</td>
            <td class="border p-2">
                ${p.image ? `<img src="{{ asset('') }}${p.image}" class="w-16 h-16 object-cover rounded">` : '-'}
            </td>
            <td class="border p-2">${p.name}</td>
            <td class="border p-2">${p.price}</td>
            <td class="border p-2">${p.stock}</td>
            <td class="border p-2">${p.category ? p.category.name : '-'}</td>
            <td class="border p-2">${p.brand ?? '-'}</td>
            <td class="border p-2">
                <button onclick="editProduct(${p.id})" class="bg-yellow-400 px-2 py-1 rounded">Edit</button>
                <button onclick="deleteProduct(${p.id})" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
            </td>
        </tr>`;
    });
    document.getElementById('productTable').innerHTML = rows;
}

// STORE PRODUCT
async function storeProduct() {
    const formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('price', document.getElementById('price').value);
    formData.append('stock', document.getElementById('stock').value);
    formData.append('category_id', document.getElementById('category_id').value);
    formData.append('brand', document.getElementById('brand').value);
    formData.append('description', document.getElementById('description').value);
    if (document.getElementById('image').files[0]) {
        formData.append('image', document.getElementById('image').files[0]);
    }

    try {
        const res = await fetch('/api/products', {
            method: 'POST',
            headers,
            body: formData
        });
        const data = await res.json();
        if (res.ok) {
            alert('Product added successfully');
            loadProducts();
            clearForm();
            document.getElementById('formBox').style.display = 'none';
        } else {
            alert(JSON.stringify(data));
        }
    } catch (err) {
        console.error(err);
        alert('Failed to add product');
    }
}

// EDIT PRODUCT
async function editProduct(id) {
    try {
        const res = await fetch(`/api/products/${id}`, { headers });
        const p = await res.json();
        editingId = id;
        document.getElementById('name').value = p.name;
        document.getElementById('price').value = p.price;
        document.getElementById('stock').value = p.stock;
        document.getElementById('category_id').value = p.category_id;
        document.getElementById('brand').value = p.brand;
        document.getElementById('description').value = p.description;

        document.getElementById('formBox').style.display = 'block';
        document.getElementById('saveBtn').style.display = 'none';
        document.getElementById('updateBtn').style.display = 'inline-block';
    } catch (err) {
        console.error(err);
        alert('Failed to fetch product data');
    }
}

// UPDATE PRODUCT
async function updateProduct() {
    const formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('price', document.getElementById('price').value);
    formData.append('stock', document.getElementById('stock').value);
    formData.append('category_id', document.getElementById('category_id').value);
    formData.append('brand', document.getElementById('brand').value);
    formData.append('description', document.getElementById('description').value);
    if (document.getElementById('image').files[0]) {
        formData.append('image', document.getElementById('image').files[0]);
    }

    try {
        const res = await fetch(`/api/products/${editingId}`, {
            method: 'POST',
            headers,
            body: formData
        });
        const data = await res.json();
        if (res.ok) {
            alert('Product updated successfully');
            loadProducts();
            clearForm();
            document.getElementById('formBox').style.display = 'none';
        } else {
            alert(JSON.stringify(data));
        }
    } catch (err) {
        console.error(err);
        alert('Failed to update product');
    }
}

// DELETE PRODUCT
async function deleteProduct(id) {
    if(!confirm('Are you sure?')) return;
    try {
        const res = await fetch(`/api/products/${id}`, {
            method: 'DELETE',
            headers
        });
        const data = await res.json();
        if (res.ok) {
            alert('Product deleted');
            loadProducts();
        } else {
            alert(JSON.stringify(data));
        }
    } catch (err) {
        console.error(err);
        alert('Failed to delete product');
    }
}

// FILTER & SUBCATEGORY
async function filterProducts(catId) {
    try {
        const res = await fetch('/api/products', { headers });
        let data = await res.json();
        data = data.filter(p => p.category && p.category.id == catId);
        renderTable(data);
    } catch (err) {
        console.error(err);
    }
}

async function showSubCategories(catId) {
    try {
        const res = await fetch(`/api/categories/${catId}/children`, { headers });
        const subs = await res.json();
        const container = document.getElementById('subCategoryCards');
        container.innerHTML = '';
        if(subs.length > 0){
            subs.forEach(sc => {
                container.innerHTML += `
                <div class="card bg-white rounded-2xl p-6 shadow cursor-pointer hover:-translate-y-1 transition"
                     onclick="filterProducts(${sc.id})">
                    <h3 class="text-sm font-semibold text-gray-500 mb-1">${sc.name}</h3>
                </div>`;
            });
            container.style.display = 'grid';
        } else {
            container.style.display = 'none';
            filterProducts(catId);
        }
    } catch (err) {
        console.error(err);
    }
}

// INITIAL LOAD
document.addEventListener('DOMContentLoaded', loadProducts);

</script>
</x-app-layout>
