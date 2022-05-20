import React, {useState} from 'react'
import NavBar from '../components/nav-bar/NavBar'
import ProductList from '../components/product-list/ProductList'

class AllProducts extends React.Component {

  constructor(){
    super()
    this.getDeletable = this.getDeletable.bind(this)
    this.handleDeleteButton = this.handleDeleteButton.bind(this)
    this.toDelete = {}
    this.buttonStatus = true

    this.setToDelete = this.setToDelete.bind(this)
    this.setButtonStatus = this.setButtonStatus.bind(this)

    this.chalala = this.chalala.bind(this)
  }

  setToDelete(value){
    this.toDelete = value
  }

  setButtonStatus(value){
    this.buttonStatus = value
  }

  getDeletable(e){
    this.setToDelete(e)
    this.handleDeleteButton()
    this.forceUpdate()
    console.log(this.toDelete)
  }

  handleDeleteButton(){
    if(Object.values(this.toDelete).includes(true)){
      this.setButtonStatus(false)
    } else {
      this.setButtonStatus(true)
    }
  }

  chalala(){
    alert('Mass Delete')
  }

  render(){
      return(
        <>
        <NavBar firstButton={{'id':'nav-first-button',
          'text':'ADD',
          'class':'btn btn-primary',
          'route':'/addproduct'}}
          secondButton={{'id':'delete-product-btn',
          'text':'MASS DELETE',
          'class':'btn btn-alert',
          'function': this.chalala,
          'buttonStatus': this.buttonStatus}}/>
        <ProductList function={this.getDeletable}/>
    </>
    )
  }
}

export default AllProducts