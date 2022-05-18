import React from 'react'
import NavBar from '../components/nav-bar/NavBar'
import ProductList from '../components/product-list/ProductList'

class AllProducts extends React.Component {
  constructor(){
    super()
    this.shout = this.shout.bind(this)
  }

  shout(){
    alert("You've clicked on Mass Delete")
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
          'function': this.shout}}/>
        <ProductList />
    </>
    )
  }
}

export default AllProducts