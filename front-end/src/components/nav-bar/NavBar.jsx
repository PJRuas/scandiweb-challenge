import React from 'react'
import './navbar.css'
import { useState } from 'react'
import { Link } from 'react-router-dom'

const NavBar = () => {
  const [deleteTrue, setDeleteTrue] = useState(false)
  return (
    <nav>
      <div className="navbar">
        <button id='add-product-btn' className='btn btn-primary'><Link className='a-route' to="/addproduct">ADD</Link></button>
        <button id='delete-product-btn' className={'btn ' + (deleteTrue ? 'btn-alert' : 'btn-blocked')}>MASS DELETE</button>
      </div>
    </nav>
  )
}

export default NavBar