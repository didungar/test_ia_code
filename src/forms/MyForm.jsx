import React, { useState } from 'react';

function Division() {
  const [num1, setNum1] = useState(0);
  const [num2, setNum2] = useState(0);
  const [result, setResult] = useState(null);

  function handleClick() {
    if (num2 === 0) {
      alert('Impossible de diviser par zéro');
    } else {
      setResult(num1 / num2);
    }
  }

  return (
    <div>
      <h1>Division</h1>
      <form onSubmit={handleClick}>
        <label htmlFor="num1">Entrez le premier nombre :</label>
        <input type="number" id="num1" value={num1} onChange={(e) => setNum1(parseInt(e.target.value, 10))} />
        <br />
        <label htmlFor="num2">Entrez le deuxième nombre :</label>
        <input type="number" id="num2" value={num2} onChange={(e) => setNum2(parseInt(e.target.value, 10))} />
        <br />
        <button type="submit">Diviser</button>
      </form>
      {result !== null ? (
        <p>La division de {num1} par {num2} donne : {result}</p>
      ) : (
        <p>Entrez les nombres pour calculer la division.</p>
      )}
    </div>
  );
}