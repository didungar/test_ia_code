import React, { useState } from 'react';
import operations from './operations.js';

const Operator = () => {
  const [operation, setOperation] = useState('');
  const [firstNumber, setFirstNumber] = useState(0);
  const [secondNumber, setSecondNumber] = useState(0);
  const [result, setResult] = useState(0);

  const handleSubmit = (event) => {
    event.preventDefault();
    const op = operations[operation];
    if (!op) return;
    setResult(op(firstNumber, secondNumber));
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Operation:
        <select value={operation} onChange={e => setOperation(e.target.value)}>
          {Object.keys(operations).map((key) => (
            <option key={key} value={key}>{key}</option>
          ))}
        </select>
      </label>
      <br />
      <label>
        First number:
        <input type="number" value={firstNumber} onChange={e => setFirstNumber(parseInt(e.target.value, 10))} />
      </label>
      <br />
      <label>
        Second number:
        <input type="number" value={secondNumber} onChange={e => setSecondNumber(parseInt(e.target.value, 10))} />
      </label>
      <br />
      <button type="submit">Calculate</button>
      <p>{result}</p>
    </form>
  );
};