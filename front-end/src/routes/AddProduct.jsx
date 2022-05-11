import React from 'react'
import { Link } from 'react-router-dom'

const AddProduct = () => {
  return (
    <>
     <div>ProductPage</div><div>
          <button id='add-product-btn' className='btn btn-primary'><Link className='a-route' to="/">BACK</Link></button>
      </div>
      </>
  )
}

export default AddProduct