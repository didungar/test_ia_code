import React, { useState } from 'react';

function FormInput() {
  const [value, setValue] = useState('');
  const [error, setError] = useState(null);

  const handleChange = (event) => {
    const inputValue = event.target.value;
    if (!inputValue.match(/^\d+$/)) {
      setError('Invalid input: only numbers are allowed');
    } else if (new Set(inputValue.split('')).size !== inputValue.length) {
      setError('Invalid input: no duplicates allowed');
    } else {
      setValue(inputValue);
      setError(null);
    }
  };

  return (
    <div>
      <label htmlFor="input">Input:</label>
      <input
        type="text"
        id="input"
        value={value}
        onChange={handleChange}
        className={error ? 'form-control is-invalid' : 'form-control'}
        placeholder="Enter a number"
      />
      {error && <div className="invalid-feedback">{error}</div>}
    </div>
  );
}