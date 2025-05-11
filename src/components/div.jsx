import React, { useState } from 'react';

function SqrtCalculator() {
  const [number, setNumber] = useState(0);
  const [sqrt, setSqrt] = useState(null);

  const handleChange = (event) => {
    setNumber(event.target.valueAsNumber);
  };

  const calculateSqrt = () => {
    setSqrt(Math.sqrt(number));
  };

  return (
    <div>
      <label htmlFor="number">Enter a number:</label>
      <input type="number" id="number" value={number} onChange={handleChange} />
      <button onClick={calculateSqrt}>Calculate sqrt</button>
      <p>{sqrt}</p>
    </div>
  );
}