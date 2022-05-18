import React, { useState } from 'react'
import './productList.css'
import Product from '../product/Product'

const ProductList = () => {

  let allProducts = [{'name':'Lord of The Rings', 'price':25.99, 'sku':'LORD', 'attribute':0.256, 'type':'book'}, 
    {'name':'Game of Thrones', 'price':19.99, 'sku':'GOT', 'attribute':526, 'type':'dvd'},
    {'name':'A Couch', 'price':425.99, 'sku':'COUCH', 'attribute':[500,250,300], 'type':'furniture'},
    {'name':'Harry Potter', 'price':15.99, 'sku':'HP', 'attribute':0.135, 'type':'book'},
    {'name':'Mary Poppins', 'price':25.99, 'sku':'MARY', 'attribute':0.123, 'type':'dvd'},
    {'name':'Black Panther', 'price':45.99, 'sku':'BLACK', 'attribute':644, 'type':'dvd'}];

  const [filteredProducts, setFilteredProducts] = useState(allProducts)
  const [searchFilter, setSearchFilter] = useState({'search-input':'', 'select-filter':'all'})

  function handleSearch(e){
    let filterState = searchFilter;
    filterState[e.target.id] = e.target.value
    setSearchFilter(filterState)
    filter(filterState['select-filter'], 'name', filterState['search-input'])
  }


  function filter(type, parameter, value) {
    let result = allProducts
    if(type != 'all'){
      result = result.filter((product) => product.type === type);
    }
    if(value) {
      result = result.filter((product) => product[parameter].toLowerCase().includes(value.toLowerCase()))
    }
    setFilteredProducts(result);
  }

  return (
    <section id='product-list' className='container'>
      <div id="product-list-header">
        <h1>Product List</h1>
        <form className='search-form'>
          <select name="filter" id='select-filter' onChange={handleSearch}>
            <option value="all">All</option>
            <option value="book">Book</option>
            <option value="dvd">Dvd</option>
            <option value="furniture">Furniture</option>
          </select>
          <div className="input-group">
           <input type="text" required id='search-input' name="search" autoComplete="off" className="input" onChange={handleSearch}/>
           <label className="input-label">Search Product(s)</label>
          </div>
        </form>
      </div>
      <div id="product-list-itens">
        {filteredProducts.map((product) => {return <Product name={product['name']} type={product['type']} attribute={product['attribute']} price={product['price']} sku={product['sku']} key={product.sku}/>})}
      </div>
    </section>
  )
}

export default ProductList