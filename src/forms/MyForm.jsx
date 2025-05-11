import React, { useState } from 'react';

function AdditionComponent() {
  const [num1, setNum1] = useState(0);
  const [num2, setNum2] = useState(0);
  const [result, setResult] = useState(0);

  const handleSubmit = (event) => {
    event.preventDefault();
    setResult((num1 + num2).toFixed(2));
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Number 1:
        <input type="text" value={num1} onChange={(event) => setNum1(event.target.value)} />
      </label>
      <br />
      <label>
        Number 2:
        <input type="text" value={num2} onChange={(event) => setNum2(event.target.value)} />
      </label>
      <br />
      <button type="submit">Add</button>
      <p>Result: {result}</p>
    </form>
  );
}