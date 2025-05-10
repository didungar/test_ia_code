import React, { useState } from 'react';

function Division() {
  const [numerator, setNumerator] = useState(0);
  const [denominator, setDenominator] = useState(1);
  const [result, setResult] = useState(0);

  const handleChangeNumerator = (event) => {
    const value = parseInt(event.target.value);
    if (!isNaN(value)) {
      setNumerator(value);
    }
  };

  const handleChangeDenominator = (event) => {
    const value = parseInt(event.target.value);
    if (!isNaN(value)) {
      setDenominator(value);
    }
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (denominator === 0) {
      alert('Cannot divide by zero!');
    } else {
      setResult(numerator / denominator);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="numerator">Numerator:</label>
        <input type="number" id="numerator" value={numerator} onChange={handleChangeNumerator} />
        <br />
        <label htmlFor="denominator">Denominator:</label>
        <input type="number" id="denominator" value={denominator} onChange={handleChangeDenominator} />
        <br />
        <button type="submit">Divide</button>
      </form>
      <p>Result: {result}</p>
    </div>
  );
}