import { useState, useEffect } from 'react';

function Input() {
  const [inputValue, setInputValue] = useState('');
  const [isValid, setIsValid] = useState(false);

  const handleChange = (event) => {
    setInputValue(event.target.value);
    setIsValid(validateInput(event.target.value));
  };

  const validateInput = (input) => {
    // Code pour valider l'entrée utilisateur
  };

  return (
    <div>
      <label htmlFor="input">Entrer votre nom</label>
      <input type="text" id="input" value={inputValue} onChange={handleChange} />
      {isValid ? (
        <p>Le nom est valide !</p>
      ) : (
        <p>Le nom est invalide !</p>
      )}
    </div>
  );
}