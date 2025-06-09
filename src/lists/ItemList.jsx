import React, { useState, useEffect } from 'react';
import WinnerDetermination from '/app/components/WinnerDetermination';

function ContestResults() {
  const [winners, setWinners] = useState(null);

  useEffect(() => {
    fetch('https://your-api.com/contest/winners')
      .then((response) => response.json())
      .then((data) => setWinners(data));
  }, []);

  return (
    <div>
      <h1>Contest Results</h1>
      {winners ? (
        <ul>
          {winners.map((winner, index) => (
            <li key={index}>{winner.name}</li>
          ))}
        </ul>
      ) : (
        <p>Loading...</p>
      )}
    </div>
  );
}