import React, { useState } from 'react';

function Calculator() {
  const [num1, setNum1] = useState(0);
  const [num2, setNum2] = useState(0);
  const [result, setResult] = useState(0);

  function handleSubmit(event) {
    event.preventDefault();
    if (num1 && num2) {
      setResult((num1 / num2).toFixed(2));
    }
  }

  return (
    <div>
      <h1>Division de deux nombres négatifs</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="num1">Nombre 1:</label>
        <input type="number" id="num1" value={num1} onChange={(event) => setNum1(event.target.value)} />
        <br />
        <label htmlFor="num2">Nombre 2:</label>
        <input type="number" id="num2" value={num2} onChange={(event) => setNum2(event.target.value)} />
        <br />
        <button type="submit">Diviser</button>
      </form>
      {result && (
        <div>
          <p>Le résultat de la division est: {result}</p>
        </div>
      )}
    </div>
  );
}