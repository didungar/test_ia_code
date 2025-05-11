import React, { useState } from 'react';

function Division() {
  const [dividend, setDividend] = useState(0);
  const [divisor, setDivisor] = useState(0);
  const [result, setResult] = useState(0);

  function handleDividendChange(event) {
    setDividend(parseInt(event.target.value));
  }

  function handleDivisorChange(event) {
    setDivisor(parseInt(event.target.value));
  }

  function handleSubmit() {
    const result = dividend / divisor;
    setResult(result);
  }

  return (
    <div>
      <h1>Division</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="dividend">Dividend:</label>
        <input type="number" value={dividend} onChange={handleDividendChange} />
        <br />
        <label htmlFor="divisor">Divisor:</label>
        <input type="number" value={divisor} onChange={handleDivisorChange} />
        <br />
        <button type="submit">Calculate</button>
      </form>
      <p>{result}</p>
    </div>
  );
}

export default Division;