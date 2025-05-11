import React, { useState } from 'react';

function Divide() {
  const [num1, setNum1] = useState(0);
  const [num2, setNum2] = useState(0);
  const [result, setResult] = useState(0);

  const handleDivide = () => {
    if (num2 !== 0) {
      setResult(num1 / num2);
    } else {
      alert('Cannot divide by zero!');
    }
  };

  return (
    <div>
      <h1>Division</h1>
      <input type="number" value={num1} onChange={(e) => setNum1(e.target.value)} />
      <input type="number" value={num2} onChange={(e) => setNum2(e.target.value)} />
      <button onClick={handleDivide}>Divide</button>
      <p>Result: {result}</p>
    </div>
  );
}