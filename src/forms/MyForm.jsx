import React, { useState } from 'react';

function GameDuration() {
  const [duration, setDuration] = useState(0);
  const [isValid, setIsValid] = useState(false);

  const handleSubmit = (event) => {
    event.preventDefault();
    const enteredDuration = Number(event.target.duration.value);
    if (enteredDuration > 0 && enteredDuration <= 10) {
      setDuration(enteredDuration);
      setIsValid(true);
    } else {
      setIsValid(false);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>Enter gameplay duration:</label>
      <input type="number" name="duration" min="1" max="10" required />
      {isValid && <p>Duration: {duration} minutes</p>}
      <button type="submit">Submit</button>
    </form>
  );
}