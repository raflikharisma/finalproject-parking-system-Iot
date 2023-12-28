import react from "react";
import RangeGraph from "./range";
import RealTimeGraph from "./graph";
import './view.css';
import ToggleButton from "./buttton";

const dashboard = () => {
  return (
    <>
      <div id="container" className="flex justify-center pb-5 pt-40 text-black-900 font-bold text-2xl border-b-2 border-black mx-auto">
          <p>Realtime Values and Graph</p>
          
        </div>
      <div className="inline-flex mt-20 mx-80">
        <div className="">
          <RealTimeGraph />
          
        </div>
        <div className="">
          <RangeGraph />
          <ToggleButton />
        </div>
        
      </div>
    </>
  );
};

export default dashboard;
