javascript
import React, { useState } from 'react';

function Calculator() {
  const [inputValue, setInputValue] = useState('');
  const [outputValue, setOutputValue] = useState('');

  const handleInputChange = (event) => {
    const inputValue = event.target.value;
    setInputValue(inputValue);
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (isValidInput(inputValue)) {
      setOutputValue(inputValue);
    } else {
      setOutputValue('Please enter a valid input');
    }
  };

  return (
    <div>
      <h1>Calculator</h1>
      <form onSubmit={handleSubmit}>
        <label>
          Enter a number:
          <input type="text" value={inputValue} onChange={handleInputChange} />
        </label>
        <button type="submit">Calculate</button>
      </form>
      <p>{outputValue}</p>
    </div>
  );
}

function isValidInput(input) {
  const regex = /^\d+$/;
  return regex.test(input);
}