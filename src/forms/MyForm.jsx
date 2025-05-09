import React, { useState } from 'react';

function SubtractNumbers() {
  const [number1, setNumber1] = useState(0);
  const [number2, setNumber2] = useState(0);
  const [result, setResult] = useState(0);

  function handleSubmit(event) {
    event.preventDefault();
    setResult(number1 - number2);
  }

  return (
    <div>
      <h1>Soustraction des deux nombres</h1>
      <form onSubmit={handleSubmit}>
        <label>
          Number 1:
          <input type="text" value={number1} onChange={(event) => setNumber1(parseInt(event.target.value))} />
        </label>
        <br />
        <label>
          Number 2:
          <input type="text" value={number2} onChange={(event) => setNumber2(parseInt(event.target.value))} />
        </label>
        <br />
        <button type="submit">Soustraire</button>
      </form>
      <p>Le résultat est: {result}</p>
    </div>
  );
}