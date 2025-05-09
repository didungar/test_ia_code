import React, { useState } from 'react';

function ZeroDivision() {
  const [numerator, setNumerator] = useState(0);
  const [denominator, setDenominator] = useState(1);
  const [result, setResult] = useState(0);

  function handleNumeratorChange(event) {
    const newValue = parseInt(event.target.value, 10);
    setNumerator(newValue);
  }

  function handleDenominatorChange(event) {
    const newValue = parseInt(event.target.value, 10);
    setDenominator(newValue);
  }

  function handleDivide() {
    if (denominator === 0) {
      alert("Cannot divide by zero!");
      return;
    }
    setResult(numerator / denominator);
  }

  return (
    <div>
      <h1>Zero Division Test</h1>
      <form>
        <label>Numerator: </label>
        <input type="number" value={numerator} onChange={handleNumeratorChange} />
        <br />
        <label>Denominator: </label>
        <input type="number" value={denominator} onChange={handleDenominatorChange} />
        <br />
        <button onClick={handleDivide}>Divide</button>
        <p>Result: {result}</p>
      </form>
    </div>
  );
}