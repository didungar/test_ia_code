import React, { useState } from 'react';

function DecimalInput() {
  const [decimals, setDecimals] = useState(0);
  const [isValid, setIsValid] = useState(false);

  const handleChange = (event) => {
    const value = event.target.value;
    const isValid = validateDecimalInput(value);
    setDecimals(value);
    setIsValid(isValid);
  };

  const validateDecimalInput = (value) => {
    const parts = value.split('.');
    if (parts.length > 2 || !parts[1].match(/^\d{0,2}$/)) {
      return false;
    }
    return true;
  };

  return (
    <div>
      <input type="number" value={decimals} onChange={handleChange} />
      {!isValid && <span className="error">Invalid decimal input</span>}
    </div>
  );
}