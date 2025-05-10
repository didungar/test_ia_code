import React, { useState } from 'react';

function DecimalTest() {
  const [number1, setNumber1] = useState(0);
  const [number2, setNumber2] = useState(0);
  const [result, setResult] = useState(0);

  const handleClick = () => {
    setResult(parseFloat(number1) + parseFloat(number2));
  };

  return (
    <div>
      <input type="text" value={number1} onChange={e => setNumber1(e.target.value)} />
      <input type="text" value={number2} onChange={e => setNumber2(e.target.value)} />
      <button onClick={handleClick}>Add</button>
      <p>{result}</p>
    </div>
  );
}