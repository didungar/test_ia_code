import React, { useState } from 'react';

function Game() {
  const [score, setScore] = useState(0);
  const [isResuming, setIsResuming] = useState(false);

  const handleResumeClick = () => {
    setIsResuming(true);
  };

  const handleScoreChange = (newScore) => {
    setScore(newScore);
  };

  return (
    <div>
      <button onClick={handleResumeClick}>Resume</button>
      <input type="text" value={score} onChange={handleScoreChange} />
      {isResuming && <p>Score resumed: {score}</p>}
    </div>
  );
}