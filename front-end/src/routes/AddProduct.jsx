import React from 'react'
import ProductFrom from '../components/product-form/ProductFrom'
import NavBar from '../components/nav-bar/NavBar'

class AddProduct extends React.Component {
  constructor(){
    super()

    this.buttonStatus = true

    this.submitForm = this.submitForm.bind(this)
    this.getStatus = this.getStatus.bind(this)
  }

  submitForm(){
    document.getElementById('SUBMIT-PRODUCT-FORM').click()
  }

  getStatus(status){
    this.buttonStatus = status
    this.forceUpdate()
  }

  render(){
    return (
      <>
        <ProductFrom parentFunction={this.submitForm} statusFunction={this.getStatus}/>
        <NavBar firstButton={{'id':'save-product-btn',
            'text':'SAVE',
            'class':'btn btn-alert',
            'function':this.submitForm,
            'buttonStatus':this.buttonStatus}}
            secondButton={{'id':'btn-cancel-add',
            'text':'CANCEL',
            'class':'btn btn-primary',
            'route': '/'}}/>
      </>
    )
  }

}
export default AddProduct