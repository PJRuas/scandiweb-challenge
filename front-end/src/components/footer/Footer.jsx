import React from 'react'
import './footer.css'
import {GoMarkGithub} from "react-icons/go"

const Footer = () => {
  return (
    <div className="external-links">
      <a className='links' href="https://github.com/PJRuas/scandiweb-challenge" target="_blank" rel="noreferrer"><GoMarkGithub /></a>
    </div>
  )
}

export default Footer