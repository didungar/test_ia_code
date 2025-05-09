import React, { useState } from 'react';

function PositiveDivision() {
  const [numerator, setNumerator] = useState(0);
  const [denominator, setDenominator] = useState(1);
  const [result, setResult] = useState(null);

  function handleNumeratorChange(event) {
    setNumerator(parseInt(event.target.value));
  }

  function handleDenominatorChange(event) {
    setDenominator(parseInt(event.target.value));
  }

  function handleClick() {
    const result = numerator / denominator;
    setResult(result);
  }

  return (
    <div>
      <h1>Positive Division</h1>
      <p>Numerator:</p>
      <input type="number" value={numerator} onChange={handleNumeratorChange} />
      <p>Denominator:</p>
      <input type="number" value={denominator} onChange={handleDenominatorChange} />
      <button onClick={handleClick}>Divide</button>
      {result !== null && (
        <div>Result: {result}</div>
      )}
    </div>
  );
}