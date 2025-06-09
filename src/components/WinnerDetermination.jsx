import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import WinnerDetermination from './WinnerDetermination';

describe('Winner Determination', () => {
  let winnerDetermination;

  beforeEach(() => {
    winnerDetermination = render(<WinnerDetermination />);
  });

  it('should determine the winner based on the contest rules and submission scores', () => {
    const submissions = [
      { score: 10, name: 'Submission A' },
      { score: 5, name: 'Submission B' },
      { score: 8, name: 'Submission C' }
    ];

    winnerDetermination.rerender(<WinnerDetermination submissions={submissions} />);

    const winner = winnerDetermination.getByText(/^Submission A$/);
    expect(winner).toBeInTheDocument();
  });
});