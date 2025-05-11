import React, { useState } from 'react';

const Divide = () => {
  const [dividend, setDividend] = useState(0);
  const [divisor, setDivisor] = useState(1);
  const [result, setResult] = useState('');
  const [error, setError] = useState(false);

  const handleClick = () => {
    try {
      const result = dividend / divisor;
      setResult(result);
      setError(false);
    } catch (e) {
      if (e.message === 'Division by zero') {
        setError(true);
      } else {
        throw e;
      }
    }
  };

  return (
    <div>
      <h1>Division</h1>
      <form onSubmit={handleClick}>
        <label htmlFor="dividend">Dividende:</label>
        <input type="number" id="dividend" value={dividend} onChange={(e) => setDividend(Number.parseInt(e.target.value))} />
        <br />
        <label htmlFor="divisor">Diviseur:</label>
        <input type="number" id="divisor" value={divisor} onChange={(e) => setDivisor(Number.parseInt(e.target.value))} />
        <br />
        <button type="submit">Dividuer</button>
      </form>
      {error ? (
        <p style={{ color: 'red' }}>Veuillez entrez un diviseur valide.</p>
      ) : (
        <p>Le résultat est {result}</p>
      )}
    </div>
  );
};