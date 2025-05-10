javascript
import React, { useState } from 'react';

function FormInput({ label, type, name }) {
  const [value, setValue] = useState('');
  const [error, setError] = useState(null);

  function handleChange(event) {
    setValue(event.target.value);
  }

  function handleSubmit(event) {
    event.preventDefault();

    // Vérifier si la saisie est correcte
    if (!validate()) {
      return;
    }

    // Envoyer les données au serveur
    fetch('/api/form', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        name,
        value
      })
    }).then(response => response.json())
      .then(data => console.log('Form submitted successfully'))
      .catch(error => console.error('Error submitting form', error));
  }

  function validate() {
    // Vérifier si la saisie est correcte
    if (value === '') {
      setError('Please enter a value');
      return false;
    } else {
      setError(null);
      return true;
    }
  }

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor={name}>{label}</label>
      <input type={type} name={name} value={value} onChange={handleChange} />
      {error && <div className="error">{error}</div>}
      <button type="submit">Envoyer</button>
    </form>
  );
}