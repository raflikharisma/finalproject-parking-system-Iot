
import "./App.css";
import React from "react";
import HumidityCard from "./view/range";
import RealtimeGraph from "./view/graph"

const App = () => {
  return (
    <div>
      <HumidityCard />
      <RealtimeGraph />
    </div>
  );
};

export default App;
