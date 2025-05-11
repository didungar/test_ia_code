import React, { useState } from 'react';

function TextInputError(props) {
  const [errorMessage, setErrorMessage] = useState('');

  function handleTextInputChange(event) {
    const inputValue = event.target.value;
    if (inputValue.length < 5) {
      setErrorMessage('Please enter at least 5 characters');
    } else {
      setErrorMessage('');
    }
  }

  return (
    <>
      <label>Enter text:</label>
      <input type="text" onChange={handleTextInputChange} />
      {errorMessage && <div className="error">{errorMessage}</div>}
    </>
  );
}