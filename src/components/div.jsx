import React, { useState } from 'react';

const NumberInput = () => {
  const [value, setValue] = useState('');
  const [errorMessage, setErrorMessage] = useState('');

  const handleChange = (event) => {
    const { value } = event.target;
    if (value > 100) {
      setErrorMessage('The number you entered is too large!');
    } else {
      setValue(value);
      setErrorMessage('');
    }
  };

  return (
    <div>
      <input type="number" value={value} onChange={handleChange} />
      {errorMessage && <p>{errorMessage}</p>}
    </div>
  );
};