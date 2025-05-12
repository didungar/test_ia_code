import React, { useState } from 'react';

function Calculator() {
  const [numerator, setNumerator] = useState(0);
  const [denominator, setDenominator] = useState(1);
  const [result, setResult] = useState(null);

  const handleChangeNumerator = (event) => {
    setNumerator(parseInt(event.target.value));
  };

  const handleChangeDenominator = (event) => {
    setDenominator(parseInt(event.target.value));
  };

  const handleClickCalculate = () => {
    if (denominator === 0 || numerator === 0) {
      alert('Le diviseur est nul ou égal à zéro');
      return;
    }

    setResult(numerator / denominator);
  };

  const handleClickReset = () => {
    setNumerator(0);
    setDenominator(1);
    setResult(null);
  };

  return (
    <div>
      <h2>Calculatrice</h2>
      <form>
        <label htmlFor="numerator">Nombre numerateur :</label>
        <input type="number" id="numerator" value={numerator} onChange={handleChangeNumerator} />
        <br />
        <label htmlFor="denominator">Nombre dénominateur :</label>
        <input type="number" id="denominator" value={denominator} onChange={handleChangeDenominator} />
        <br />
        <button type="button" onClick={handleClickCalculate}>Calculez</button>
        <button type="button" onClick={handleClickReset}>Remise à zéro</button>
      </form>
      <p>{result ? `Le résultat est ${result}` : ''}</p>
    </div>
  );
}