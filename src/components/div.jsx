javascript
import React, { useState } from 'react';
import Evaluator from './evaluator';

function Evaluation({ question, answer }) {
  const [evaluated, setEvaluated] = useState(false);

  const evaluateAnswer = () => {
    const result = Evaluator.eval(question, answer);
    setEvaluated(result);
  };

  return (
    <div>
      <button onClick={evaluateAnswer}>Evaluate</button>
      {evaluated && <p>Your answer is correct!</p>}
      {!evaluated && <p>Your answer is incorrect.</p>}
    </div>
  );
}