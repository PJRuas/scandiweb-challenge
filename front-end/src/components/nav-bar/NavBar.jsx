import React from 'react'
import './navbar.css'
import { Link } from 'react-router-dom'

class NavBar extends React.Component{
  constructor(props){
    super(props)
    this.buttons = {'firstButton': props.firstButton, 'secondButton' : props.secondButton}   
    this.firstFunction = this.firstFunction.bind(this)
    this.secondFunction = this.secondFunction.bind(this)
  }
  
  firstFunction(){
    this.props.firstButton.function()
  }
  
  secondFunction(){
    this.props.secondButton.function()
  }
  
  handleButtonContent(buttonParams){
    if(buttonParams.route){
      return (
        <Link className='a-route' to={buttonParams.route}>{buttonParams.text}</Link>
      )
      } else {
      return buttonParams.text
    }
  }
  
  render() {
    return (
      <nav>
    <div className="navbar">
    {}
    
    <button id={this.buttons.firstButton.id} className={this.buttons.firstButton.class} onClick={this.buttons.firstButton.function}>{this.handleButtonContent(this.buttons.firstButton)}</button>
    <button id={this.buttons.secondButton.id} className={this.buttons.secondButton.class} onClick={this.buttons.secondButton.function}>{this.handleButtonContent(this.buttons.secondButton)}</button>
    </div>
    </nav>
    )
  }
}
  
export default NavBar