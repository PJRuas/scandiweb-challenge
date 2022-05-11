import React from 'react';
import './product.css';
import bookImg from '../../resources/images/book.png'
import dvdImg from '../../resources/images/dvd.png'
import furnitureImg from '../../resources/images/furniture.png'

const Product = (props) => {
  let productImage = {'book' : bookImg, 'dvd' : dvdImg, 'furniture' : furnitureImg};

  let product = {'name' : props.name ? props.name : 'Test Name', 
  'price' : props.price ? props.price : 25.99, 
  'sku' : props.sku ? props.sku : 'TSTSKU', 
  'attribute' : props.attribute ? props.attribute : 'Product Attribute',
  'type' : props.type ? props.type : 'furniture',
  };

  return (
    <section className="product">
      <label className='product-checkbox'>
          <input type="checkbox" name="delete-checkbox" className='delete-checkbox'/>
          <div className="checkbox"></div>
      </label>
        <img className='product-image' src={productImage[product.type]} alt={product.type + ' default picture'}/>
        <h5>{product.sku}</h5>
        <h3>{product.name}</h3>
        <h5>{product.attribute}</h5>
        <h4>U${product.price}</h4>
    </section>
  )
}

let product = Product.product;

export {product}
export default Product