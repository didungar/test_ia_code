import React, { useState } from 'react';
import InputHandler from './InputHandler';

const MyComponent = () => {
  const [inputValue, setInputValue] = useState('');

  const handleChange = (event) => {
    setInputValue(event.target.value);
  };

  return (
    <div>
      <h1>Gestion des inputs utilisateur</h1>
      <input type="text" value={inputValue} onChange={handleChange} />
      <p>{InputHandler.process(inputValue)}</p>
    </div>
  );
};

export default MyComponent;