javascript
import React, { useState } from 'react';
import FinalAddition from './FinalAddition';

function App() {
  const [firstNumber, setFirstNumber] = useState(0);
  const [secondNumber, setSecondNumber] = useState(0);
  const [sum, setSum] = useState(0);

  const handleClick = () => {
    setSum(FirstAddition.add(firstNumber, secondNumber));
  };

  return (
    <div>
      <h1>Addition de deux nombres</h1>
      <input type="number" value={firstNumber} onChange={(e) => setFirstNumber(e.target.value)} />
      <input type="number" value={secondNumber} onChange={(e) => setSecondNumber(e.target.value)} />
      <button onClick={handleClick}>Add</button>
      <p>{sum}</p>
    </div>
  );
}

export default App;