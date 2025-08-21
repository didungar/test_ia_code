import React, { useState } from 'react';

function Division() {
  const [dividend, setDividend] = useState(0);
  const [divisor, setDivisor] = useState(0);
  const [result, setResult] = useState(0);

  const handleChangeDividend = (event) => {
    setDividend(parseInt(event.target.value));
  };

  const handleChangeDivisor = (event) => {
    setDivisor(parseInt(event.target.value));
  };

  const handleClick = () => {
    if (divisor !== 0) {
      setResult(dividend / divisor);
    } else {
      alert('Le diviseur ne peut pas être nul');
    }
  };

  return (
    <div>
      <input type="number" value={dividend} onChange={handleChangeDividend} />
      <input type="number" value={divisor} onChange={handleChangeDivisor} />
      <button onClick={handleClick}>Diviser</button>
      {result !== 0 && (
        <p>Le résultat est : {result}</p>
      )}
    </div>
  );
}