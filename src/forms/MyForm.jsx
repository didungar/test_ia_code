import React, { useState } from 'react';

function TestCalculation() {
  const [result, setResult] = useState(0);
  const [inputA, setInputA] = useState('');
  const [inputB, setInputB] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    const calculation = parseInt(inputA) + parseInt(inputB);
    setResult(calculation);
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Input A:
        <input type="text" value={inputA} onChange={(e) => setInputA(e.target.value)} />
      </label>
      <br />
      <label>
        Input B:
        <input type="text" value={inputB} onChange={(e) => setInputB(e.target.value)} />
      </label>
      <br />
      <button type="submit">Calculate</button>
      <p>{result}</p>
    </form>
  );
}