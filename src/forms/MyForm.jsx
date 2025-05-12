javascript
import React, { useState } from 'react';

function Form() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [errors, setErrors] = useState([]);

  const handleSubmit = (event) => {
    event.preventDefault();
    if (!validateForm()) {
      return;
    }
    // code à exécuter lorsque le formulaire est soumis et valide
  };

  const validateForm = () => {
    let errors = [];
    if (name === '') {
      errors.push('Name is required');
    }
    if (email === '') {
      errors.push('Email is required');
    } else if (!validateEmail(email)) {
      errors.push('Invalid email address');
    }
    setErrors(errors);
    return errors.length === 0;
  };

  const handleNameChange = (event) => {
    setName(event.target.value);
  };

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="name">Name:</label>
      <input type="text" id="name" value={name} onChange={handleNameChange} />
      {errors.map((error, index) => (
        <div key={index} className="error">{error}</div>
      ))}
      <br />
      <label htmlFor="email">Email:</label>
      <input type="text" id="email" value={email} onChange={handleEmailChange} />
      {errors.map((error, index) => (
        <div key={index} className="error">{error}</div>
      ))}
      <br />
      <button type="submit">Submit</button>
    </form>
  );
}

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}