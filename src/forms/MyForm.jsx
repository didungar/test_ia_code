import React, { useState } from 'react';

const handleZeroDivisionError = (num1, num2) => {
  if (num2 === 0) {
    return { hasError: true, errorMessage: `Cannot divide by zero` };
  } else {
    return { hasError: false, result: num1 / num2 };
  }
};

const App = () => {
  const [num1, setNum1] = useState(0);
  const [num2, setNum2] = useState(0);
  const [hasError, setHasError] = useState(false);
  const [errorMessage, setErrorMessage] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    const result = handleZeroDivisionError(num1, num2);
    if (result.hasError) {
      setHasError(true);
      setErrorMessage(result.errorMessage);
    } else {
      setHasError(false);
      setErrorMessage('');
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="num1">First number:</label>
        <input type="number" id="num1" value={num1} onChange={(e) => setNum1(parseInt(e.target.value, 10))} />
        <br />
        <label htmlFor="num2">Second number:</label>
        <input type="number" id="num2" value={num2} onChange={(e) => setNum2(parseInt(e.target.value, 10))} />
        <br />
        {hasError && (
          <div className="error">{errorMessage}</div>
        )}
      </form>
    </div>
  );
};