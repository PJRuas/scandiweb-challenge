import React, {useState} from 'react'
import { Link } from 'react-router-dom'
import './productForm.css'
import Product from '../product/Product'

const ProductFrom = () => {
    const typeFields = {
        'book':[{'Weight':'Kg'}],
        'dvd':[{'Size':'MB'}],
        'furniture':[{'Height':'cm'}, {'Width':'cm'}, {'Length':'cm'}]
    }

    const initialPreview = [{
        'name':'', 'type':'', 'price':'', 'attribute':'', 'sku': ''
    }]

    const [formFields, setFormFields] = useState(typeFields['book'])

    const [productPreview, setProductPreview] = useState(initialPreview)

    const [attributeConverter, setAttributeConverter] = useState({}) 

    let saveTrue = false

    function handleType(e){
        handleFields(e)
        handlePreview('PERFORM RESET')
    }

    function handleAttribute(e){
        let commonFields = ['sku', 'name', 'price', 'type']
        let attribute = e.target
        let attributes = attributeConverter
        if (!commonFields.includes(attribute.id)) {
            attributes[attribute.id] = attribute.value
        }
        setAttributeConverter(attributes)
    }

    function handlePreview(e) {
        let previewInput = productPreview[0];
        
        if(e === 'PERFORM RESET'){
            previewInput.type = document.getElementById('type').value
            previewInput.attribute = ''
            setProductPreview([previewInput])
            return
        }

        handleAttribute(e)
        let attribute = []
        for(let field in attributeConverter){
            for(let i of formFields){
                if (i[field] ) {
                    attribute.push(attributeConverter[field])
                }
            }
        }
        if (isArrayEmpty(attribute)){
            attribute = ''
        }
        previewInput['attribute'] = attribute
        previewInput[e.target.id] = e.target.value
        setProductPreview([previewInput])
    }

    function isArrayEmpty(array) {
        let emptyParameters = [null, '']
        let check = true;
        if(array.length === 0) {
            return check
        }
        for(let item of array){
            if(!emptyParameters.includes(item)){
                check = false;
                return check
            }
        }
        return check
    }

    function handleFields(e) {
        setFormFields(typeFields[e.target.value])
        resetFields()
    }

    function resetFields() {
        for(let key of Object.keys(typeFields)){
            for(let item of (typeFields[key])){
                Object.keys(item).map((id => {
                    let target = document.getElementById(id)
                    if(target){
                        target.value = ''
                    }
                }))
            }
        }
    }

  return (
      <section className='container' id='add-product-page'>
        <div id="add-product-header">
            <h1>Add Product</h1>
        </div>
        <div id="product-view">
            <div>
                <form id='product-form'>
                    <div id="form-selector">
                        <label id='select-label'>Type</label>
                        <select name="productType" id="type" onChange={handleType}>
                            <option value="book">Book</option>
                            <option value="dvd">Dvd</option>
                            <option value="furniture">Furniture</option>
                        </select>
                    </div>
                    <div className="input-group">
                        <input type="text" autoComplete='off' name="productSku" className="input" id="sku" required onChange={handlePreview}/>
                        <label className='input-label'>Sku</label>
                    </div>
                    <div className="input-group">
                        <input type="text" autoComplete='off' name="productName" className="input" id="name" required onChange={handlePreview}/>
                        <label className='input-label'>Name</label>
                    </div>
                    <div className="input-group">
                        <input type="number" autoComplete='off' name="productPrice" step="0.01" min="0.01" className="input" id="price" required onChange={handlePreview}/>
                        <label className='input-label'>Price</label>
                    </div>
                    {formFields.map((field) => {return <>
                        <div className='input-group'>
                            <input type="number" autoComplete='off' name={Object.keys(field)[0]} step="0.01" min="0.01" className="input" id={Object.keys(field)[0]} required onChange={handlePreview}/>
                            <label className='input-label'>{ Object.keys(field)[0]}</label>
                        </div>
                    </>
                    })}
                    <button id='save-product-btn' className={'btn ' + (saveTrue ? 'btn-alert' : 'btn-blocked')} type='submit'>SAVE</button>
                </form>
                    <button id='btn-cancel' className='btn btn-primary' ><Link className='a-route' to="/">CANCEL</Link></button>
            </div>
            <div className="product-preview">
                {productPreview.map((input) =>  <Product name={input.name} type={input.type} price={input.price} sku={input.sku} attribute={input.attribute}/>)}
            </div>
        </div>
    </section>
  )
}

export default ProductFrom